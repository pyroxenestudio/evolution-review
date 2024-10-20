import BoxGame from "@/Components/BoxGame";
import Title from "@/Components/Title";
import DefaultLayout from "@/Layouts/DefaultLayout";


export default function GamesIndex(props: any) {
  const {games} = props;
  console.log(games);

  const listOfGames = games.map((game: any) => {
    return (
      <BoxGame key={game.id} title={game.title} id={game.id} date={game.updated_at} platforms={game.platforms}/>
    );
  });
  return (
    <DefaultLayout>
      <Title>Last Games Reviews</Title>
      <section className='sm:grid sm:grid-cols-2 sm:gap-4 md:grid md:grid-cols-3 md:gap-4'>
        {listOfGames}
      </section>
    </DefaultLayout>
  )
}