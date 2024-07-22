import { IAuthModel } from "@/domain/auth/models";
import { IAuthEntity } from "@/infrastructure/entities";

export class AuthMapper {
    static toMap(entity: IAuthEntity): IAuthModel {
        return {
            ...entity,
            tokenType: entity.token_type
        }
    }
}