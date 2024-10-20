import SubTitle from "@/Components/SubTitle";
import Title from "@/Components/Title";
import DefaultLayout from "@/Layouts/DefaultLayout";
import { Button } from "@headlessui/react";
import { useForm } from "@inertiajs/react";
import { useState } from "react";

interface Iprops {
  review: any;
  versions: string[];
  gameVersions: any[];
}

export default function Reviews(props: Iprops) {
  console.log(props);
  const {review, versions} = props;
  // HOOKS
  const {data, setData, get ,post, processing, errors, reset} = useForm({
    // gameVersion: '',
    // reviewVersion: '',
    review: review.id
  })

  // STATES
  const [gameVersionSelected, setGameVersionSelected] = useState(review.game_version);
  const [reviewVersionSelected, setReviewVersionSelected] = useState(review.review_version);

  // const SelectGameVersions = function() {
  //   const options = gameVersions.map((gameVersion: any) => {
  //     return <option  value={gameVersion.version} key={gameVersion.version}>{gameVersion.version}</option>
  //   });
  //   // return <select onChange={(event) => setGameVersionSelected(event.target.value)} value={gameVersionSelected}>{options}</select>
  //   return (
  //     <label>
  //       Game Version
  //       <select className='text-black' onChange={(event) => get(route(`review.show`, {'review': 4, 'game_version': event.target.value}))} value={gameVersionSelected}>{options}</select>
  //     </label>
  //   )
  // }

  // const SelectReviewVersions = function() {
  //   const options = reviewVersions.map((reviewVersion: any) => {
  //     return <option  value={reviewVersion.version} key={reviewVersion.version}>{reviewVersion.version}</option>
  //   });
  //   return (
  //     <label>
  //       Review Version
  //       <select className='text-black' onChange={(event) => setReviewVersionSelected(event.target.value)} value={reviewVersionSelected}>{options}</select>
  //     </label>
  //   )
  // }

  const SelectReviewVersions = function() {
    const options = versions.map((reviewVersion: any) => {
      return <option value={reviewVersion.review_id} key={reviewVersion.review_id}>{`Game: ${reviewVersion.game_version} - Review: ${reviewVersion.review_version}`}</option>
    });
    return (
      <label>
        Versions
        <select className='text-black' onChange={(event) => get(route(`review.show`, {'review': event.target.value}))} value={data['review']}>{options}</select>
      </label>
    )
  }

  const testSendData = function() {
    get(route(`review.show`, {'review': 4, 'review_version': reviewVersionSelected}))
  }


  return (
    <DefaultLayout>
      <Title>{review.title}</Title>
      <SubTitle>{review.platform}</SubTitle>
      <section>
        {/* <SelectGameVersions /> */}
      </section>
      <section>
        <SelectReviewVersions />
      </section>
      <article>
        {review.review}
      </article>
      <Button onClick={testSendData}>Prueba</Button>
    </DefaultLayout>
  )
}