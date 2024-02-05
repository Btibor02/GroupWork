from hairdresser import Hairdresser
import pickle

def __main__():
    """
    find combination of services in cache and display price
    or
    calculate  and display price
    """

    FILE_NAME = "cache.bin"

    hairdresser = Hairdresser()

    chosen_services = prompt_user(hairdresser)
    
    print(chosen_services)


    try:
        with open(FILE_NAME, "rb") as option_logs :
            cache = pickle.load(option_logs)


    except :
        cache = {}
        print(f"File {FILE_NAME} was not found") 

    finally:
        if not cache and tuple(chosen_services) in cache.keys():
            print(f"Price pulled from cache\n{chosen_services} : cache[chosen_services]")

        else:
            cache[tuple(chosen_services)] = hairdresser.calculate_price(chosen_services)
            with open(FILE_NAME, "wb") as option_logs:
                pickle.dump(cache, option_logs)

        # memoization
        # look into the cache file to see if the combination of services was already chosen and get the price
        


def prompt_user(hairdresser:Hairdresser):
    """
    prompt the user what services he wants
    with three sections : haircuts, beard care, products
    """

    chosen_services = []

    print(f"Choose a type of service:\
            \n1. Haircuts\
            \n2. Beard care\
            \n3. Products\
            \n4. Pay")

    user_choice = int(input(">>> "))


    while user_choice != 4:

        print(f"\n{'-'*30}\n\nType in one of the following options:\n")

        match user_choice:
            case 1:
                haircut_services = hairdresser.get_haircut_services()

                for service, price in haircut_services.items():
                    print(f"* {service} -- {price}$")

                option = input(">>> ")

                if option in haircut_services.keys() :
                    chosen_services.append(option)
                    print(f"\nChoice saved.\
                            \nCart -- {chosen_services}")

                else: print("Not a valid option")

            case 2:
                beard_services = hairdresser.get_beard_services()

                for service, price in beard_services.items():
                    print(f"* {service} -- {price}$")

                option = input(">>> ")

                if option in beard_services.keys() :
                    chosen_services.append(option)
                    print(f"\nChoice saved.\
                            \nCart -- {chosen_services}")

                else: print("Not a valid option")

            case 3:
                products = hairdresser.get_products()

                for service, price in products.items():
                    print(f"* {service} -- {price}$")

                option = input(">>> ")

                if option in products.keys() :
                    chosen_services.append(option)
                    print(f"\nChoice saved.\
                            \nCart -- {chosen_services}")

                else: print("Not a valid option")

        print(f"\n{'-'*40}\n\
                \nChoose a type of service:\
                \n1. Haircuts\
                \n2. Beard care\
                \n3. Products\
                \n4. Pay")

        user_choice = int(input(">>> "))

    return chosen_services


if __name__ == "__main__":
    __main__()
