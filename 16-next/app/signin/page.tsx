import { SignIn } from "@stackframe/stack"
import Link from "next/link"

export default function SignInPage()
{
    return (
        <div className="bg-indigo-200 min-h-dvh gap-2 p-4 flex flex-col items-center justify-center">
        <SignIn />
        <Link href="/">Go Back Home</Link>
        </div>
    )
}