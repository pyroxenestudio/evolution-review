interface Iprop {
  children: React.ReactNode
}

export default function Title(props: Iprop) {
  const { children } = props;
  return (
    <h1 className='text-3xl mb-4 font-bold'>
      { children }
    </h1>
  )
}