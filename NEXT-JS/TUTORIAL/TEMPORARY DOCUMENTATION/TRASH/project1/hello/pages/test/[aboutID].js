import { useRouter } from "next/router"

function details(){
    const router = useRouter();
    let id = router.query.aboutID
    return(
        <div>
            <h1>About {id}</h1>
        </div>
    )
}
export default details