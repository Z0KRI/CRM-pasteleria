export interface IResponseAPI {
    http: HTTP;
    meta: Pages;
}

interface HTTP {
    status: number;
    message: null;
    method: string;
    success: boolean;
}

export interface Pages {
    currentPage: number;
    nextPage: null;
    totalPages: number;
    perPage: number;
    totalRecords: number;
    prevPage: null;
}