import { defaultBrand, type Brand } from './Brand';
import { defaultCategory, type Category } from './Category';
import { defaultVendor, type Vendor } from './Vendor';

export interface Product {
    id: number;
    vendor_id: number;    
    category_id: number;
    brand_id: number;
    name: string;
    slug: string;
    description: string;
    base_price: string;
    offer_price: string;
    status: string;
    created_at?: string;
    updated_at?: string;
    image_url: string;
    thumbnail_url: string;
    category: Category;
    brand: Brand;
    vendor: Vendor;
}

export const defaultProduct: Product = {
    id: 0,
    vendor_id: 0,
    category_id: 0,
    brand_id: 0,
    name: '',
    slug: '',
    description: '',
    base_price: '',
    offer_price: '',
    status: '',
    created_at: '',
    updated_at: '',
    image_url: '',
    thumbnail_url: '',
    category: { ...defaultCategory },
    brand: { ...defaultBrand },
    vendor: { ...defaultVendor },
};
/* 
"id": 10,
        "vendor_id": 1,
        "category_id": 2,
        "brand_id": 2,
        "name": "Aarong Rajshahi Silk Saree - Maroon",
        "slug": "aarong-rajshahi-silk-saree-maroon",
        "description": "Lustrous Rajshahi silk saree with a self-woven border. Light to drape and easy to maintain.",
        "base_price": "7800.00",
        "offer_price": "7020.00",
        "status": "active",
        "created_at": "2026-02-18T04:27:50.000000Z",
        "updated_at": "2026-02-18T18:27:50.000000Z",
        "image_url": "http://multivendor-ecommerce.test/img/fallback/product-fallback-svg.svg",
        "thumbnail_url": "http://multivendor-ecommerce.test/img/fallback/product-fallback-svg.svg",
        "category": {
            "id": 2,
            "name": "Women's Fashion",
            "icon_url": "http://multivendor-ecommerce.test/img/fallback/category-fallback.svg"
        },
        "brand": {
            "id": 2,
            "name": "Aarong"
        },
        "vendor": {
            "id": 1,
            "shop_name": "Rupkotha Fashion House",
            "logo_url": "http://multivendor-ecommerce.test/img/fallback/vendor-fallback.svg"
        }
*/