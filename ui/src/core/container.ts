import { HTTPClass } from '@/infrastructure/common/classes/http.class';
import { Container } from 'inversify';

const container = new Container();

container.bind<HTTPClass>('HTTPClass').to(HTTPClass);

export default container;