import {Component, OnInit} from "@angular/core";
import {NgForm} from "@angular/forms";
import {Post} from "../../interfaces/post.interface";
import {PostsService} from "../../services/posts.service";
import {Router, ActivatedRoute} from "@angular/router";

@Component({
  selector: "app-post",
  templateUrl: "./post.component.html",
  styleUrls: ["./post.component.scss"],
})
export class PostComponent implements OnInit {
  post: Post = {
    id: "",
    title: "",
    content: "",
    category: "",
    author: {
      name: "",
      surname: "",
      emailContact: "",
    },
  };

  id: string = "";
  private form: any;
  statusOK: boolean = false;

  constructor(
    private postsService: PostsService,
    private router: Router,
    private activatedRoute: ActivatedRoute
  ) {
    this.activatedRoute.params.subscribe({
      next: (params) => {
        this.id = params["id"];

        this.getPost();
      },
    });
  }

  ngOnInit() {}

  savePost(form: NgForm) {
    this.form = form;

    this.checkIssetPost();
  }

  addNew(form: NgForm) {
    this.router.navigate(["/post", "new"]);

    form.reset();
  }

  createPost() {
    this.postsService.createPost(this.post).subscribe({
      next: (data: Post) => {
        this.router.navigate(["/post", data.id]);

        this.statusOK = true;
      },
      error: (error) => console.error(error),
    });
  }

  updatePost() {
    this.postsService.updatePost(this.post, this.id).subscribe({
      next: (data: Post) => {
        this.router.navigate(["/post", this.id]);

        this.statusOK = true;
      },
      error: (error) => console.error(error),
    });
  }

  formReset(form: NgForm) {
    this.router.navigate(["/post", "new"]);

    form.reset({});
  }

  getPost() {
    if (this.id !== "new") {
      this.postsService.getPost(this.id).subscribe({
        next: (data: Post) => {
          this.post.title = data.title;
          this.post.content = data.content;
          this.post.id = data.id;
          this.post.category = data.category;
          this.post.author = data.author;
        },
      });
    }
  }

  checkIssetPost() {
    if (this.id === "new") {
      this.createPost();
    } else {
      this.updatePost();
    }
  }
}
