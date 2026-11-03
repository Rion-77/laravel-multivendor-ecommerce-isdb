export interface Category {
  id: number;
  name: string;
  icon_url: string;
  slug: string;
  products_count: number;
}

export const defaultCategory: Category = {
  id: 0,
  name: "",
  icon_url: "",
  slug: "",
  products_count: 0
};
