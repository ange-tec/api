export default function AddShowpping() {
    const submitForm = async () => {

    }

    return (
        <form
            action="#"
            method="POST"
        >
            <label htmlFor="title">Titre</label>
            <input
                type="text"
                name="title"
                required
            />
            <label htmlFor="description">Description</label>
            <input
                type="text"
                name="description"
                required
            />
            <label htmlFor="price">Prix</label>
            <input
                type="text"
                name="description"
                required
            />
            <button
                type="submit"
            > Créer </button>
        </form>
    )
}