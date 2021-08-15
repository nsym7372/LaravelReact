import React from "react";
import {
    BrowserRouter,
    Switch,
    Route,
    Link
} from "react-router-dom";
import TaskPage from './pages/tasks';
import HelpPage from "./pages/help";
import LoginPage from "./pages/login";


export default function Router() {
    return (
        <BrowserRouter>
            <div>
                <header className="global-head">
                    <ul>
                        <li><Link to="/public">ホーム</Link></li>
                        <li><Link to="/public/help">ヘルプ</Link></li>
                        <li><Link to="/public/login">ログイン</Link></li>
                        <li><span>ログアウト</span></li>
                    </ul>
                </header>

                {/* A <Switch> looks through its children <Route>s and
            renders the first one that matches the current URL. */}
                <Switch>
                    <Route path="/public">
                        <TaskPage />
                    </Route>
                    <Route path="/public/help">
                        <HelpPage />
                    </Route>
                    <Route path="/public/login">
                        <LoginPage />
                    </Route>
                </Switch>
            </div>
        </BrowserRouter>
    );
}
