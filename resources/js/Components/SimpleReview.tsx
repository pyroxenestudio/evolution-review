interface Iprop {
  platform: string;
  baseScore: number;
  finalScore: number;
  version: string;
  reviewId: number;
}

export default function SimpleReview(props: Iprop) {
  const {platform, baseScore, finalScore, version, reviewId} = props;
  return (
    <a href={`/review/${reviewId}`} className='flex mb-2 flex-col bg-slate-800 rounded hover:border-slate-700 border-slate-800 border-2'>
      <section className='grid grid-cols-3 gap-4'>
        <span className='p-4 bg-slate-600 font-bold text-xl'>{platform}</span>
        <span className='p-4 text-xl'>Final: {finalScore}</span>
        <span className='p-4 text-xl'>Base: {baseScore}</span>
      </section>
    </a>
  )
}