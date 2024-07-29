import { IAuthLoginModel } from "../models/login.model";
import { IResponseAPI } from "@/common/interfaces";
import { IAuthModel } from "../models";

export abstract class AuthRepository {
    abstract login(payload: IAuthLoginModel): Promise<IAuthModel>

    abstract logout(): Promise<IResponseAPI>
}