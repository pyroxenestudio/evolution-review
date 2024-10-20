interface Iprop {
  tag: string;
}

export default function Tag(props: Iprop) {
  const { tag } = props;
  
  return (
    <span className='bg-emerald-700 px-3 text-sm'>
      {tag}
    </span>
  )
}