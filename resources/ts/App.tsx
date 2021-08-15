import React from 'react';
import { Route } from 'react-router';
import Router from './router';
import { QueryClientProvider, QueryClient } from 'react-query';

export default function App() {
    const queryClient = new QueryClient({
        defaultOptions:{
            queries:{
                retry: false
            },
            mutations:{
                retry: false
            }
        }
    });

    return(
        <QueryClientProvider client={queryClient}>
            <Router />
        </QueryClientProvider>
    )
}
