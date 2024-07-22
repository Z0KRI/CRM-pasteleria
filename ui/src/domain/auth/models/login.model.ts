import { IAuthModel } from "./auth.model";

export interface IAuthLoginModel extends Pick<IAuthModel, 'email'> {
    password: string
}