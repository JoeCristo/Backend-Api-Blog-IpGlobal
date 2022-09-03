import {RouterModule, Routes} from "@angular/router";
import {PostViewComponent} from "./components/posts/post-view.component";
import {PostComponent} from "./components/posts/post.component";
import {PostsComponent} from "./components/posts/posts.component";

const APP_ROUTES: Routes = [
  {path: "posts", component: PostsComponent},
  {path: "post/:id", component: PostComponent},
  {path: "post/:id/:view", component: PostViewComponent},
  {path: "**", pathMatch: "full", redirectTo: "posts"},
];

export const APP_ROUTING = RouterModule.forRoot(APP_ROUTES);
