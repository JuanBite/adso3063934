import { PrismaClient } from '../src/generated/prisma'
import { PrismaNeon } from '@prisma/adapter-neon'

const prisma = new PrismaClient({
    adapter: new PrismaNeon({
        connectionString: process.env.DATABASE_URL!
    })
})

export default async function GamesInfo() {
    const games = await prisma.game.findMany({
        include: { console: true }
    })
    return (
        <div className="p-6">
            <h1 className="text-2xl font-bold mb-6">Games</h1>

            <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                {games.map((game) => (
                    <div
                        key={game.id}
                        className="relative rounded-2xl overflow-hidden shadow-lg group"
                    >
                        {/* Imagen */}
                        <img
                            src={"img/"+game.cover} // asegúrate de tener este campo en tu modelo
                            alt={game.title}
                            className="w-full h-72 object-cover group-hover:scale-105 transition"
                        />

                        {/* Badge (consola en vez de descargas) */}
                        <div className="absolute top-2 left-2 bg-black/70 text-white text-xs px-3 py-1 rounded-full">
                            🎮 {game.console.name}
                        </div>

                        {/* Overlay */}
                        <div className="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent" />

                        {/* Título */}
                        <div className="absolute bottom-3 left-3 right-3">
                            <h2 className="text-white font-semibold text-lg leading-tight">
                                {game.title}
                            </h2>
                        </div>
                    </div>
                ))}
            </div>
        </div>
    )
}