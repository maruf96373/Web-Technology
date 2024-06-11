def input_graph():
    graph = {}
    while True:
        line = input("Enter node and its neighbors: ").strip()
        if line.lower() == 'done':
            break
        parts = line.split()
        node = parts[0]
        neighbors = parts[1:]
        graph[node] = neighbors
    
        for neighbor in neighbors:
            if neighbor not in graph:
                graph[neighbor] = []
    return graph

def bfs(graph, start_node, visited):
    queue = []
    
    visited.append(start_node)
    queue.append(start_node)
    
    while queue:
        node = queue.pop(0)
        print(node, end=" ")
        
        for neighbour in graph[node]:
            if neighbour not in visited:
                visited.append(neighbour)
                queue.append(neighbour)

def bfs_full(graph, start_node):
    visited = []
    
    # Start BFS from the specified starting node
    bfs(graph, start_node, visited)
    
    # Check for any unvisited nodes and perform BFS on them
    for node in graph:
        if node not in visited:
            bfs(graph, node, visited)

# Input graph from the user
graph = input_graph()

# Input starting node from the user
start_node = input("\nEnter the start node: ").strip()

print(f"\nFollowing is the Breadth-First Search of the entire graph starting from node {start_node}")
bfs_full(graph, start_node)
