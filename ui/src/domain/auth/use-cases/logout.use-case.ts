import { IUseCase } from "@/domain/common/interfaces/use-case.interface";
import { AuthRepository } from "../repositories/auth.repository";
import { IResponseAPI } from "@/common/interfaces";

export class LogOutUseCase implements IUseCase<IResponseAPI, void> {
    constructor(
        private readonly authRepository: AuthRepository
    ) { }

    execute(): Promise<IResponseAPI> {
        return this.authRepository.logout()
    }
}