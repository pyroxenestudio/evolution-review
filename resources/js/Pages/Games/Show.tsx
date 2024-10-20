import SimpleReview from "@/Components/SimpleReview";
import SubTitle from "@/Components/SubTitle";
import Title from "@/Components/Title";
import DefaultLayout from "@/Layouts/DefaultLayout";
import dayjs from "dayjs/esm";

interface Iprops{
  reviews: any;
  game: any;
}

export default function ShowGame(props: Iprops) {
  const {reviews, game} = props;
  const listOfReviews: any = [];
  const statusSupport: any = [];
  if (reviews && game) {
    const color = dayjs().diff(game.created_at, 'month') > 6 ? 'bg-red-600' : 'bg-emerald-600';
    reviews.map((review: any) => {
      listOfReviews.push(
        <SimpleReview
          key={review.platform}
          platform={review.platform}
          baseScore={review.base_score}
          finalScore={review.final_score}
          version={review.review_version}
          reviewId={review.review_id}/>
        );
      statusSupport.push(
        <div className='flex items-center last:mb-4' key={review.platform}>
          <span className='p-2 pl-0 font-bold text-xl'>{review.platform}</span>
          <span className={`p-2 text-xl ${color} h-1 w-1 rounded-full`}/>
        </div>
      )
    });
  }
  return (
    <DefaultLayout>
      <article>
        <Title>{game.title}</Title>
        <SubTitle>Status Support</SubTitle>
        <section>
          {statusSupport}
        </section>
        <SubTitle>Reviews By Last Version</SubTitle>
        {listOfReviews}
      </article>
    </DefaultLayout>
  )
}