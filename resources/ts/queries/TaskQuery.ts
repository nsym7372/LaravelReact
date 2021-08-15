import axios from 'axios';
import { useQuery } from 'react-query'
import { Task } from '../types/Task';
// hooks
// const [tasks, setTasks] = useState<Task[]>([]);

// const getTasks = async () => {
//     const { data } = await axios.get<Task[]>('api/tasks');
//     // console.log(data);
//     setTasks(data);
// }

// useEffect(() => {
//     getTasks();
// })

// react-query

export const useTasks = () => {
    return useQuery('tasks', async () => {
        const { data, status } = await axios.get<Task[]>('api/tasks');
        return data;
    })
};