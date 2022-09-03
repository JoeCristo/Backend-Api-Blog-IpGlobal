import {BrowserModule} from "@angular/platform-browser";
import {NgModule} from "@angular/core";
import {HttpClientModule} from "@angular/common/http";
import {FormsModule, ReactiveFormsModule} from "@angular/forms";

// ROUTES
import {APP_ROUTING} from "./app.routes";

// COMPONENTS
import {AppComponent} from "./app.component";
import {HeaderComponent} from "./components/header/header.component";

// SERVICES

// PIPES
import {KeysPipe} from "./pipes/keys.pipe";
import {FooterComponent} from "./components/footer/footer.component";

// EXTERNAL
import {NgxPaginationModule} from "ngx-pagination";
import {PostsComponent} from "./components/posts/posts.component";
import {PostComponent} from "./components/posts/post.component";
import {PostViewComponent} from "./components/posts/post-view.component";
import {PostsService} from "./services/posts.service";

@NgModule({
  declarations: [
    AppComponent,
    PostsComponent,
    PostComponent,
    PostViewComponent,
    KeysPipe,
    HeaderComponent,
    FooterComponent,
  ],
  imports: [
    BrowserModule,
    HttpClientModule,
    FormsModule,
    ReactiveFormsModule,
    APP_ROUTING,
    NgxPaginationModule,
  ],
  providers: [PostsService],
  bootstrap: [AppComponent],
})
export class AppModule {}
