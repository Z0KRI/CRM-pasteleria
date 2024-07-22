import type { IHeaders } from "@/common/interfaces";
import type { Router } from "vue-router";
import Cookies from "js-cookie";

export class UtilClass {
    private router: Router;

    constructor(router: Router) {
        this.router = router;
    }

    public params(queryParams: any) {
        this.router.replace({ query: { ...this.router.currentRoute.value.query, ...queryParams } })
        const params = new URLSearchParams({ ...this.router.currentRoute.value.query, ...queryParams } as Record<
            string,
            string
        >).toString()
        return params
    }

    public headers(): IHeaders {
        const token = Cookies.get('token');
        return {
            Accept: 'application/json',
            Authorization: `Bearer ${token}`,
            'Content-Type': 'application/json',
        }
    }
}