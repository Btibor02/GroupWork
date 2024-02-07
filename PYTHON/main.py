from hairdresser import Hairdresser
from time import time
import pickle

def __main__():
    """
    This program prompts the user for haircut services
    and computes the prices using memoization
    """

    # name of cache file (will be created if none exists)
    FILE_NAME = "cache.bin"

    hairdresser = Hairdresser()

    # hairdresser menu
    chosen_services = tuple(prompt_user(hairdresser))    

    # memoization part
    # look into the cache file to see if the combination 
    # of services was already chosen and get the price
    try:
        with open(FILE_NAME, "rb") as option_logs :
            cache = pickle.load(option_logs)

    # create cache file if there is none
    except :
        cache = {}
        print(f"File {FILE_NAME} was not found") 

    finally:
        # timer to compare the time it takes with and without memoization
        start_timer = time()

        if tuple(chosen_services) in cache.keys():
            print(f"Price pulled from cache\n{chosen_services} : {cache[chosen_services]}")

        else:
            print("Price not found in cache\nComputing price ... ", end = "")
            cache[chosen_services] = hairdresser.calculate_price(chosen_services)
            print(f"Done.\n{chosen_services} : {cache[chosen_services]}")
            with open(FILE_NAME, "wb") as option_logs:
                pickle.dump(cache, option_logs)

        # stop and print timer
        timer_time = time() - start_timer
        print(f"Time it took : {timer_time:.10f}")

        
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

    # user_choice = 4 means pay
    while user_choice != 4:

        print(f"\n{'-'*30}\n\nType in one of the following options:\n")

        match user_choice:
            # hairstyle page
            case 1:
                haircut_services = hairdresser.get_haircut_services()

                for service, price in haircut_services.items():
                    print(f"* {service} -- {price}$")

                option = input(">>> ").title()

                if option in haircut_services.keys() :
                    chosen_services.append(option)
                    print(f"\nChoice saved.\
                            \nCart -- {chosen_services}")

                else: print("Not a valid option")

            # beard care page
            case 2:
                beard_services = hairdresser.get_beard_services()

                for service, price in beard_services.items():
                    print(f"* {service} -- {price}$")

                option = input(">>> ").title()

                if option in beard_services.keys() :
                    chosen_services.append(option)
                    print(f"\nChoice saved.\
                            \nCart -- {chosen_services}")

                else: print("Not a valid option")

            # products page
            case 3:
                products = hairdresser.get_products()

                for service, price in products.items():
                    print(f"* {service} -- {price}$")

                option = input(">>> ").title()

                if option in products.keys():
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

    print()

    return chosen_services


if __name__ == "__main__":
    __main__()
