import axios from "axios";

export const baseUrl = 'http://multivendor-ecommerce.test/';
export const baseUrlApi = `${baseUrl}api/backend/`;

export const api = axios.create({
    baseURL: baseUrlApi,
    withCredentials: true,
    withXSRFToken: true,
    headers: {
        'Content-Type': 'application/json',
    },
})