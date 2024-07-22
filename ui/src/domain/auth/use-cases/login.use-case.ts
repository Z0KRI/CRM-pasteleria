import { IUseCase } from "@/domain/common/interfaces/use-case.interface";
import { AuthRepository } from "../repositories/auth.repository";
import { IAuthLoginModel, IAuthModel } from "../models";

export class LoginUseCase implements IUseCase<IAuthModel, IAuthLoginModel> {
    constructor(
        private readonly authRepository: AuthRepository
    ) { }

    execute(payload: IAuthLoginModel): Promise<IAuthModel> {
        return this.authRepository.login(payload)
    }
}