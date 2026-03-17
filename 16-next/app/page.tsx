import Link from "next/link"

export default function Home() 
{
  return (
    <div className="bg-indigo-900 min-h-dvh gap-2 p-4 flex flex-col items-center justify-center">
      <h2 className="text-4xl ">Hello Next JS</h2>
      <p className="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti aliquid inventore porro nemo sit repellendus quas? Ullam aperiam tempora, inventore assumenda corporis optio, ea rem aspernatur enim, nam voluptate quae rerum perferendis eum in. Enim!</p>
      <Link href="signin" className="btn btn-outline">SignIn</Link>
    </div>
  )
}   