export interface PageLink {
  url: string | null;
  label: string;
  active: boolean;
}

export interface Paginated<T> {
  data: T[];
  links: PageLink[];
}

export const defaultPageLink: PageLink = {
  url: null,
  label: "",
  active: false,
};

export function defaultPaginated<T>(data: T[] = []): Paginated<T> {
  return {
    data,
    links: [],
  };
}
