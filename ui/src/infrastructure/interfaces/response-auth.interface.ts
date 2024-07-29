import type { IResponseAPI } from "@/common/interfaces";
import type { IAuthEntity } from "../entities";

export interface IAuthLogin extends Pick<IAuthEntity, 'email'> {
    password: string
}

export interface IAuthResponse extends IResponseAPI {
    data: IAuthEntity
}