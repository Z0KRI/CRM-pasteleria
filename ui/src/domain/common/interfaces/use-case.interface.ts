export interface IUseCase<T, P> {
    execute?(payload: P): Promise<T>

    executeWithId?(payload: P, id: number | string): Promise<T>

    executeWithOrigin?(payload: P, origin: string[]): Promise<T>
}