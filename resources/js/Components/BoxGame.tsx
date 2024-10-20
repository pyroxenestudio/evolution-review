import { Link } from "@inertiajs/react";
import Tag from "./Tag";

interface Iprops{
  title: string;
  id: number;
  date: string;
  platforms: string;
}

export default function BoxGame(props: Iprops) {
  const {title, id, date, platforms} = props;

  const tags = platforms.split(',').map((tag: string) => {
    return <Tag tag={tag}/>
  });

  return (
    <Link href={`/game/${id}`} method='get' id='box-game' className='flex flex-col justify-between min-h-36 p-2 bg-slate-800 mb-2 rounded hover:border-slate-700 border-slate-800 border-2'>
      <header className='flex flex-col'>
        <h1 className='font-bold text-2xl'>{title}</h1>
        <h2 className='font-light text-sm'>{date}</h2>
      </header>
      {/* <footer className='grid grid-flow-col auto-cols-max'>{tags}</footer> */}
      <footer>{tags}</footer>
    </Link>
  )
}