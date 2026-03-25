import { PrismaClient } from '../src/generated/prisma'
import { PrismaNeon } from '@prisma/adapter-neon'
import SearchInput from '@/components/SearchInput'
import Pagination from '@/components/Pagination'

const prisma = new PrismaClient({
    adapter: new PrismaNeon({
        connectionString: process.env.DATABASE_URL!
    })
})

const PER_PAGE = 12

export default async function GamesInfo({ searchParams }) {
    const { q, page } = await searchParams
    const search = q || ''
    const currentPage = Number(page) || 1

    const where = search
        ? {
            OR: [
                { title: { contains: search, mode: 'insensitive' } },
                { genre: { contains: search, mode: 'insensitive' } },
                { developer: { contains: search, mode: 'insensitive' } },
                { console: { name: { contains: search, mode: 'insensitive' } } },
            ],
        }
        : {}

    const [games, total] = await Promise.all([
        prisma.game.findMany({
            where,
            include: { console: true },
            skip: (currentPage - 1) * PER_PAGE,
            take: PER_PAGE,
        }),
        prisma.game.count({ where }),
    ])

    const totalPages = Math.ceil(total / PER_PAGE)

    return (
        <div className="p-6">
            <div className="flex items-center gap-4 mb-6">
                <h1 className="text-2xl font-bold text-white">Games</h1>
                <SearchInput />
            </div>

            <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                {games.map((game) => (
                    <div
                        key={game.id}
                        className="relative rounded-2xl overflow-hidden shadow-lg group"
                    >
                        <img
                            src={"img/" + game.cover}
                            alt={game.title}
                            className="w-full h-72 object-cover group-hover:scale-105 transition"
                        />
                        <div className="absolute top-2 left-2 bg-black/70 text-white text-xs px-3 py-1 rounded-full">
                            🎮 {game.console.name}
                        </div>
                        <div className="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent" />
                        <div className="absolute bottom-3 left-3 right-3">
                            <h2 className="text-white font-semibold text-lg leading-tight">
                                {game.title}
                            </h2>
                        </div>
                    </div>
                ))}
            </div>

            {/* Paginador */}
            <Pagination currentPage={currentPage} totalPages={totalPages} />
        </div>
    )
}