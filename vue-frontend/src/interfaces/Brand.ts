export interface Brand {
    id: number;
    name: string;
    products_count: number;
}

export const defaultBrand: Brand = {
    id: 0,
    name: '',
    products_count: 0
};
