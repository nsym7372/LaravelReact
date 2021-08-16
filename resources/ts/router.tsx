import React from "react";
import {
    BrowserRouter,
    Switch,
    Route,
    Link
} from "react-router-dom";
import TaskPage from './pages/tasks/index';
import HelpPage from "./pages/help/index";
import LoginPage from "./pages/login/index";


export default function Router() {
    return (

        <BrowserRouter>
            <div>
                <header className="global-head">
                    <ul>
                        <li><Link to="/">ホーム</Link></li>
                        <li><Link to="/help">ヘルプ</Link></li>
                        <li><Link to="/login">ログイン</Link></li>
                        <li><span>ログアウト</span></li>
                    </ul>
                </header>

                {/* A <Switch> looks through its children <Route>s and
            renders the first one that matches the current URL. */}
                <Switch>
                    <Route path="/help">
                        <HelpPage />
                    </Route>
                    <Route path="/login">
                        <LoginPage />
                    </Route>
                    <Route path="/">
                        <TaskPage />
                    </Route>
                </Switch>
            </div>
        </BrowserRouter>
    );
}


function Home() {
    return <h2>Home</h2>;
}

function About() {
    return <h2>About</h2>;
}

function Users() {
    return <h2>Users</h2>;
}