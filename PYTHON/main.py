from hairdresser import Hairdresser
import sys

def __main__():
    """
    prompt the user what services he wants
    with three sections : haircuts, beard care, products

    find combination of services in cache and display price
    or
    calculate  and display price
    """

    hairdresser = Hairdresser()

    user_services = prompt_user(hairdresser)
    
    print(user_services)

    try:
        with open(sys.argv[1], "r") as option_logs :
            cache = option_logs.read()


    except FileNotFoundError:
        print("File not found")


def prompt_user(hairdresser:Hairdresser):

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
