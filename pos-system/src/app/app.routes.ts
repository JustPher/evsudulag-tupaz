import { Routes } from '@angular/router';

export const routes: Routes = [
    {
        path: 'main',
        loadChildren: () => import('./modules/users/user.module').then(m => m.UserModule)
    },
    {
        path: '',
        redirectTo: 'main',
        pathMatch: 'full'
    }
];
