import {Component, OnInit} from "@angular/core";
import {Post} from "../../interfaces/post.interface";
import {PostsService} from "../../services/posts.service";
import {Router, ActivatedRoute} from "@angular/router";

@Component({
  selector: "app-post-view",
  templateUrl: "./post-view.component.html",
  styleUrls: [],
})
export class PostViewComponent implements OnInit {
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

  private new = false;
  private id: string = "";
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

  getPost() {
    this.postsService.getPost(this.id).subscribe({
      next: (data: any) => {
        this.post.title = data.title;
        this.post.content = data.content;
        this.post.id = data.id;
        this.post.category = data.category;
        this.post.author = data.author;
      },
    });
  }
}
