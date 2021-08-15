import React, { useEffect, useState } from 'react';
import { useTasks } from '../../queries/TaskQuery';
import TaskInput from './TaskInput';
import TaskList from './TaskList';


export default function TaskPage() {


    return (
        <>
            <TaskInput />
            <TaskList />
        </>
    )
}

