import {Injectable} from "@angular/core";
import {HttpClient} from "@angular/common/http";
import {OnInit} from "@angular/core";
import {Post} from "../interfaces/post.interface";
import {Observable} from "rxjs";

@Injectable({
  providedIn: "root",
})
export class PostsService implements OnInit {
  private baseUrl: string = "http://localhost:1000/posts";

  constructor(private httpClient: HttpClient) {}

  ngOnInit() {}

  createPost(post: Post): Observable<Post> {
    delete post.id;
    const DATA_CREATE = JSON.stringify(post);

    return this.httpClient.post<Post>(this.baseUrl, post);
  }

  updatePost(post: Post, id: string): Observable<Post> {
    const DATA_UPDATE = JSON.stringify(post);

    const realId = (parseInt(id) + 1).toString();
    const url = `${this.baseUrl}/${realId}`;

    return this.httpClient.put<Post>(url, post);
  }

  getPost(id: string): Observable<Post> {
    const realId = (parseInt(id) + 1).toString();

    const url = `${this.baseUrl}/${realId}`;

    return this.httpClient.get<Post>(url);
  }

  getPosts(): Observable<Post[]> {
    return this.httpClient.get<Post[]>(this.baseUrl);
  }

  deletePost(id: string): Observable<void> {
    const realId = (parseInt(id) + 1).toString();
    const url = `${this.baseUrl}/${realId}`;

    return this.httpClient.delete<void>(url);
  }
}
