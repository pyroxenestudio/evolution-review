interface Iprop {
  children: React.ReactNode;
}

export default function SubTitle(props: Iprop) {
  const {children} = props;
  return (
    <h2 className='text-2xl mb-4 font-bold'>{children}</h2>
  )
}