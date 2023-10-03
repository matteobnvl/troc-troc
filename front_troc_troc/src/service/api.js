const BASE_URL = 'http://127.0.0.1:8000'

export default {
    setApiService (app, service) {
        app.config.globalProperties.$api = service
        return app
    },

    async register (data) {
        try {
            const response = await fetch(`${BASE_URL}/api/register`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            });
            if (!response.ok) {
                const errorMessage = await response.text()
                throw new Error(`API responded with status ${response.status}: ${errorMessage}`)
            }
            return await response.json()
        } catch (error) {
            console.error('Error during registration:', error)
            throw error;
        }
    }
}