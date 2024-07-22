import { IAuthLoginModel, IAuthModel } from "@/domain/auth/models";
import { AuthRepository } from "@/domain/auth/repositories/auth.repository";
import { AuthService } from "@/infrastructure/services";
import { AuthMapper } from "../mappers/auth.mapper";
import { IResponseAPI } from "@/common/interfaces";

export class AuthImpRepository extends AuthRepository {
    constructor(
        private readonly service: AuthService
    ) {
        super()
    }

    override async login(payload: IAuthLoginModel): Promise<IAuthModel> {
        return this.service.login(payload).then(async (resp) => {
            return AuthMapper.toMap(resp)
        })
    }

    override async logout(): Promise<IResponseAPI> {
        return this.service.logout()
    }
}