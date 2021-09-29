import currentPriceTransformer from '../transformers/CurrentPriceTransformer'

class CurrentPriceUtils {
    static useTransformFromApiCurrentPrice(item) {
        item = currentPriceTransformer.transformFromApiCurrentPrice(item)
        return item
    }
}

export default CurrentPriceUtils
