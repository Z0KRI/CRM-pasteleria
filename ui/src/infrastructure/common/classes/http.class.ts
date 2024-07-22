import type { IHeaders } from '@/common/interfaces';
import { injectable } from 'inversify';

@injectable()
export class HTTPClass {
    constructor() { }

    public get(url: string, params: string, headers: IHeaders = {
        Accept: 'application/json',
        'Content-Type': 'application/json',
    }) {
        const urlWithParams = params ? `${url}?${params}` : url;
        return fetch(urlWithParams, {
            method: 'GET',
            headers: this.getHeaderInit(headers)
        })
    }

    public patch(url: string, payload: any, headers: IHeaders = {
        Accept: 'application/json',
        'Content-Type': 'application/json',
    }) {
        return fetch(url, {
            method: 'PATCH',
            headers: this.getHeaderInit(headers),
            body: JSON.stringify(payload),
        })
    }

    public post(url: string, payload: any, headers: IHeaders = {
        Accept: 'application/json',
        'Content-Type': 'application/json',
    }) {
        return fetch(url, {
            method: 'POST',
            headers: this.getHeaderInit(headers),
            body: JSON.stringify(payload),
        })
    }

    public delete(url: string, params: string, headers: IHeaders = {
        Accept: 'application/json',
        'Content-Type': 'application/json',
    }) {
        const urlWithParams = params ? `${url}?${params}` : url;
        return fetch(urlWithParams, {
            method: 'DELETE',
            headers: this.getHeaderInit(headers)
        })
    }

    private getHeaderInit(headers: IHeaders): Record<string, string> {
        return { ...headers }
    }
}