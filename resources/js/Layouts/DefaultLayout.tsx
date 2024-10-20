import { Link } from '@inertiajs/react'
import { PropsWithChildren } from 'react'

export default function DefaultLayout({ children }: PropsWithChildren) {
  return (
    <>
      <header className='bg-indigo-900 py-4'>
        {/* <Link href="/">Home</Link>
        <Link href="/about">About</Link>
        <Link href="/contact">Contact</Link> */}
        <div id='header-bar' className='mx-2 sm:container sm:mx-auto'>
          <Link href='/' className='text-2xl'>Evolution Review</Link>
        </div>
      </header>
      <main className='mt-4 m-2 sm:container sm:mx-auto'>
        {children}
      </main>
    </>
  )
}