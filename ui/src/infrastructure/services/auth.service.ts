import { UtilClass, HTTPClass } from "../common/classes";
import type { Router } from 'vue-router';
import { inject } from "inversify";
import { environment } from "@/env";
import { IAuthLogin } from "../interfaces";
import { IAuthEntity } from "../entities";
import { IResponseAPI } from "@/common/interfaces";

export class AuthService extends UtilClass {
    private readonly url = `${environment.HOST}/${environment.APIpath}/${environment.version}/auth`

    constructor(
        @inject('HTTPClass')
        private http: HTTPClass,
        @inject('Router')
        router: Router
    ) {
        super(router)
    }

    async login(payload: IAuthLogin): Promise<IAuthEntity> {
        return await this.http.post<IAuthEntity>(`${this.url}/sign-in`, payload, this.headers())
    }

    async logout(): Promise<IResponseAPI> {
        return await this.http.post(`${this.url}/sign-out`, {}, this.headers())
    }
}