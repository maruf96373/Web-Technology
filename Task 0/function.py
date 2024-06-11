def input_graph():
    graph = {}
    print("Enter the graph as adjacency list (e.g., 'A B C' where A is connected to B and C).")
    print("Enter 'done' when finished.")
    while True:
        line = input("Enter node and its neighbors: ").strip()
        if line.lower() == 'done':
            break
        parts = line.split()
        node = parts[0]
        neighbors = parts[1:]
        graph[node] = neighbors
        # Ensure all nodes, even if they have no neighbors, are in the graph
        for neighbor in neighbors:
            if neighbor not in graph:
                graph[neighbor] = []
    return graph

visited = []  # List for visited nodes
queue = []  # Initialize a queue

def bfs(visited, graph, node):  # Function for BFS
    visited.append(node)
    queue.append(node)
 
    while queue:  # Creating a loop to visit each node
        m = queue.pop(0)
        print(m, end=" ")
 
        for neighbour in graph[m]:
            if neighbour not in visited:
                visited.append(neighbour)
                queue.append(neighbour)

# Input graph from the user
graph = input_graph()

print("Following is the Breadth-First Search")
start_node = input("Enter the start node: ").strip()
bfs(visited, graph, start_node)
