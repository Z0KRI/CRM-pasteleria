import type { IHeaders } from '@/common/interfaces';
import { injectable } from 'inversify';

@injectable()
export class HTTPClass {
    constructor() { }

    public async get<T>(url: string, params?: string, headers: IHeaders = {
        Accept: 'application/json',
        'Content-Type': 'application/json',
    }): Promise<T> {
        const urlWithParams = params ? `${url}?${params}` : url;
        return await fetch(urlWithParams, {
            method: 'GET',
            headers: this.getHeaderInit(headers)
        }).then(async (res) => {
            const resp = await res.json()
            return resp
        })
    }

    public async patch<T>(url: string, payload: any = {}, headers: IHeaders = {
        Accept: 'application/json',
        'Content-Type': 'application/json',
    }) {
        return await fetch(url, {
            method: 'PATCH',
            headers: this.getHeaderInit(headers),
            body: JSON.stringify(payload),
        }).then(async (res) => {
            const resp = await res.json()
            return resp
        })
    }

    public async post<T>(url: string, payload: any = {}, headers: IHeaders = {
        Accept: 'application/json',
        'Content-Type': 'application/json',
    }): Promise<T> {
        return fetch(url, {
            method: 'POST',
            headers: this.getHeaderInit(headers),
            body: JSON.stringify(payload),
        }).then(async (res) => {
            const resp = await res.json();
            return resp
        })
    }

    public async delete<T>(url: string, params: string, headers: IHeaders = {
        Accept: 'application/json',
        'Content-Type': 'application/json',
    }): Promise<T> {
        const urlWithParams = params ? `${url}?${params}` : url;
        return await fetch(urlWithParams, {
            method: 'DELETE',
            headers: this.getHeaderInit(headers)
        }).then(async (res) => {
            const resp = await res.json()
            return resp
        })
    }

    private getHeaderInit(headers: IHeaders): Record<string, string> {
        return { ...headers }
    }
}