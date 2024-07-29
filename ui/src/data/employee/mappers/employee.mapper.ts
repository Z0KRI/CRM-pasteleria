import { IEmployeeEntity } from "@/infrastructure/entities";
import { IEmployeeModel, IIndexEmployeeModel } from "@/domain/employee/models";
import { IEmployeeIndexResponse } from "@/infrastructure/interfaces";

export class EmployeeMapper {
    static toMap(entity: IEmployeeEntity): IEmployeeModel {
        const { paternal_surname, maternal_surname, store_id, job_id, user_id, ...data } = entity
        return {
            ...data,
            paternalSurname: paternal_surname,
            maternalSurname: maternal_surname,
            storeId: store_id,
            jobId: job_id,
            userId: user_id
        }
    }

    static mapToIndex(resp: IEmployeeIndexResponse): IIndexEmployeeModel {
        const { data, meta, http } = resp
        return {
            data: data.map((e) => this.toMap(e)),
            http,
            meta
        }
    }
}