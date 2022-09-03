import {Component, OnInit} from "@angular/core";
import {Post} from "src/app/interfaces/post.interface";
import {PostsService} from "../../services/posts.service";

@Component({
  selector: "app-posts",
  templateUrl: "./posts.component.html",
  styleUrls: ["./posts.component.scss"],
})
export class PostsComponent implements OnInit {
  categories: {id: string; name: string}[] = [
    {id: "PROBLEM_SOLUTION", name: "Problema-solución"},
    {id: "TUTORIAL", name: "Tutoriales"},
    {id: "TRENDS", name: "Tendencias"},
  ];

  posts: Post[] = [];
  public statusOK: boolean = false;
  public pageCurrent: number = 1;

  constructor(private postsService: PostsService) {
    this.postsService.getPosts().subscribe({
      next: (data: Post[]) => {
        this.posts = data;
      },
    });
  }

  ngOnInit() {}

  deletePost(id: string) {
    this.postsService.deletePost(id).subscribe({
      next: (data) => {
        this.statusOK = true;

        this.posts.splice(parseInt(id), 1);
      },
    });
  }

  getCategory(value?: string): string | null {
    if (value && value !== undefined) {
      const category = this.categories.find((item) => item.id === value);

      return category !== undefined ? category.name : "";
    }

    return null;
  }
}
