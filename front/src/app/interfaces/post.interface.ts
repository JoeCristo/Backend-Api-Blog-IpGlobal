import {Author} from "./author.interface";

export interface Post {
  id?: string;
  title: string;
  content: string;
  category?: string;
  author: Author;
}
